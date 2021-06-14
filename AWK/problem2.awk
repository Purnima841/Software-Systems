BEGIN{N=0;print "Number of devices on full capacity"}
int ($5)==100{print $1;N++}
END{print "Total: "N" devices"}
