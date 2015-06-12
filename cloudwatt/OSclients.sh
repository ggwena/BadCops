#!/bin/sh
cp rdo-icehous.repo /etc/yum.repos.d/
yum install -y python-{nova,cinder,glance,ceilometer,heat,neutron}client

