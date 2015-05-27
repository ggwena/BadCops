#!/bin/bash
[ "$1" == "-a" ] && auto="yes"

echo "### [BadCops] build all "
echo "### [BadCops] edit badcops.spec "

topdir="$(echo $HOME)/BadCops/rpmbuild"
cd $topdir
echo last file :
ls -tr SPECS/*.spec | tail -1

SPECFILE=$(ls -tr SPECS/*.spec | tail -1)
echo SPECFILE=$SPECFILE

echo "### [BadCops] ready to build $SPECFILE ? ([y]/n) "
[ -z "$auto" ] && read ret && [ -n "$ret" ] && [ "$ret" != "y" ] && exit 0


rpmbuild -bb $SPECFILE
[ $? -ne 0 ] && echo ERROR && exit 1

echo "### [BadCops] RPMs available: "
ls -ltr RPMS/noarch
LASTRPM=$(ls -tr RPMS/noarch/*.rpm | tail -1)
echo "### [BadCops] Last RPM: $LASTRPM"

echo "### [BadCops] ready to install last RPM ? ([y]/n) "
[ -z "$auto" ] && read ret && [ -n "$ret" ] && [ "$ret" != "y" ] && exit 0

sudo rpm -Uv $LASTRPM --force

echo "### [BadCops] finished"
cd -

