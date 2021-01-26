#!/bin/bash
# while true; do /usr/local/bin/reventlog_last;sleep 70; done; 
#
while true
do

PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/opt/xcat/bin:/opt/xcat/sbin
events=$(sqlite3 /tmp/test.db 'select * from test' | tail -1)
sleep 90

rm -rf /tmp/ipmi_event_node
rm -rf /tmp/list_ipmi_ip


sqlite3=`which sqlite3`
DB_FILE=/tmp/test.db
SQLITE_OPTIONS=" -column -header  "
 
$sqlite3 $DB_FILE  "
        create table IF NOT EXISTS  test (
		node TEXT NOT NULL,
		dat TEXT NOT NULL,
		taim TEXT NOT NULL,
                event TEXT NOT NULL,
		CONSTRAINT con_primary_name PRIMARY KEY(node,dat,event));"

tabdump ipmi | cut -f 1 -d , -s | sed 's/\"//g' |  sed '1d' | sort > /tmp/list_ipmi_ip


for event_node in $(cat /tmp/list_ipmi_ip )

do
reventlog $event_node >> /tmp/ipmi_event_node
done

while read LINE
do
node=$(echo "$LINE" | awk '{print $1}'| sed 's/\://g'  )
dat2=$(echo "$LINE"  | awk '{print $2}' )
#dat=$(echo "$LINE"  | awk '{print $2}' | date -d  +%Y-%m-%d )
dat=$(date -d "$dat2" +%Y-%m-%d)
taim=$(echo "$LINE" | awk '{print $3}' )
event=$(echo "$LINE"  |  awk '{out=""; for(i=4;i<=NF;i++){out=out" "$i}; print out}' )




$sqlite3 $DB_FILE  " insert into test (node,dat,taim,event) values  ('$node', '$dat', '$taim','$event')"

done < /tmp/ipmi_event_node



echo "Уже было внесено:"
$sqlite3 $SQLITE_OPTIONS $DB_FILE <<EOF
        SELECT * FROM test;
EOF

rm -rf /tmp/list_ipmi_ip


lastevents=$(sqlite3 /tmp/test.db 'select * from test' | tail -1)

#echo $events
#echo $lastevents

if [ "$events" == "$lastevents" ]; then
        echo "no change"
else

#TOKEN Telegram BOT	
TOKEN=
#CHAT ID Telegram BOT
CHAT_ID=
URL="https://api.telegram.org/bot$TOKEN/sendMessage"

curl -s -X POST $URL -d chat_id=$CHAT_ID -d text="$lastevents"

fi

sleep 70
done

