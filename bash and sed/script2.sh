#!/bin/bash

i=1;
while read lines 
do 
if [[ ! $lines =~ ^$ ]] 
then 
echo "($i)$lines" >> output.txt
((i++))
else
echo "($i)" >> output.txt
((i++))
fi
done < $1
exit

