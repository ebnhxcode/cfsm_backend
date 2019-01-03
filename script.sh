#!/bin/bash
for i in `ls -la ./app/*.php |awk '{print $9}'|sed 's/.php//g'|sed 's/app\///g'` do; php artisan make:controller $iController --resource;done
