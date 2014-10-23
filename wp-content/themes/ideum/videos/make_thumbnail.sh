# /bin/bash

inFile=$1
outFile=${inFile/.mp4/.png}

ffmpegthumbnailer -i $inFile -o $outFile -t 00:00:00 -s 0

