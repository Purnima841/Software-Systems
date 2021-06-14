BEGIN{print "File System|Available Storage|Used|Percentage\n"}
NR>1 && int($5)>30 {print $1"|" $2"|" $3"|" $5"\n"}
