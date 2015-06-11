#!/bin/sh
echo tutu
echo "### nova boot "
nova boot --flavor t1.cw.tiny --image "CentOS 6.5" --key-name KP_BadCops-Dev_GLL --security-groups SSH_Only,SGrpAdmin --user_data user_data_file.yaml IN-BAD-DEV1-GLL-01
echo "### sleep "
sleep 30

echo "### nova floating-ip-associate "
nova floating-ip-associate IN-BAD-DEV1-GLL-01 84.39.35.168

echo "### nova show "
nova show IN-BAD-DEV1-GLL-01

sleep 10

echo "### nova floating-ip-associate "
nova floating-ip-associate IN-BAD-DEV1-GLL-01 84.39.35.168

echo "### nova show "
nova show IN-BAD-DEV1-GLL-01

