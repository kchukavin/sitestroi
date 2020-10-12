
Советы от Google:
https://developers.google.com/speed/docs/insights/OptimizeImages




Конвертировать все *.png в *.jpg в текущей папке:
> mogrify -format jpg -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB *.png

