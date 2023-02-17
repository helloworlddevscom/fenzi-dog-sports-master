#!/bin/bash


echo "Clearing out web/wp-content/plugins/fenzi-wp-blocks in 5 seconds..."
sleep 1
echo "4 seconds..."
sleep 1
echo "3 seconds..."
sleep 1
echo "2 seconds..."
sleep 1
echo "1 second..."
sleep 1
pwd
echo "Pulling latest blocks..."
if [ -d "web/wp-content/plugins/fenzi-wp-blocks" ]; then
  cd web/wp-content/plugins
  rm -rf fenzi-wp-blocks
else
  cd web/wp-content/plugins
fi

git clone https://github.com/HelloWorldDevs/fenzi-wp-blocks.git
cd fenzi-wp-blocks
rm -rf .git
rm -r .gitignore

echo "Done."
