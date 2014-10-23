# !/bin/bash

inFile=$1
outFile=${inFile/.mp4/.webm}

~/ffmpeg/ffmpeg -i $inFile -c:v libvpx -crf 10 -b:v 1M -c:a libvorbis $outFile
