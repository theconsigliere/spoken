#!/bin/sh

DEVDIR="web/app/uploads/"
DEVSITE="https://spoken.test"

STAGDIR="forge@167.99.197.207:/home/forge/spoken.maxwellkirwin.co.uk/web/app/uploads/"
STAGSITE="https://spoken.maxwellkirwin.co.uk"

PRODDIR="forge@167.99.197.207:/home/forge/spokenexmouth.com/web/app/uploads/"
PRODSITE="http://spokenexmouth.com"

FROM=$1
TO=$2

case "$1-$2" in
  development-production) DIR="up";  FROMSITE=$DEVSITE;  FROMDIR=$DEVDIR;  TOSITE=$PRODSITE; TODIR=$PRODDIR; ;;
  development-staging)    DIR="up"   FROMSITE=$DEVSITE;  FROMDIR=$DEVDIR;  TOSITE=$STAGSITE; TODIR=$STAGDIR; ;;
  production-development) DIR="down" FROMSITE=$PRODSITE; FROMDIR=$PRODDIR; TOSITE=$DEVSITE;  TODIR=$DEVDIR; ;;
  staging-development)    DIR="down" FROMSITE=$STAGSITE; FROMDIR=$STAGDIR; TOSITE=$DEVSITE;  TODIR=$DEVDIR; ;;
  *) echo "usage: $0 development production | development staging | production development | production staging" && exit 1 ;;
esac

read -r -p "Would you really like to reset the $TO database and sync $DIR from $FROM? [y/N] " response

if [[ "$response" =~ ^([yY][eE][sS]|[yY])$ ]]; then
  cd ../ &&
  wp "@$TO" db export &&
  wp "@$FROM" db export - | wp "@$TO" db import - &&
  wp "@$TO" search-replace "$FROMSITE" "$TOSITE" --all-tables &&
  rsync -az --progress "$FROMDIR" "$TODIR"
fi