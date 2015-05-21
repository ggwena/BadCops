#!/bin/bash

echo "### [BadCops] installing rpmbuild "
sudo yum install --enablerepo=G02R02C00 rpm-build

echo "### [BadCops] configuring rpmbuild environment"
# as non root user:
topdir="$(echo $HOME)/BadCops/rpmbuild"
mkdir -p $topdir/{BUILD,RPMS,S{OURCE,PEC,RPM}S}
mkdir -p $topdir/RPMS/{i386,i586,i686,noarch}

# macros used from : /usr/lib/rpm/macros,   then ~/.rpmmacros
cat > ~/.rpmmacros << EOF
%_topdir                %(echo \$HOME)/BadCops/rpmbuild
%debug_package          %{nil}
EOF

echo "### [BadCops] rpmbuild configured successfully"

