#! /bin/bash

current_dir=$( cd -- "$( dirname -- "${BASH_SOURCE[0]} ")" &> /dev/null && pwd );

#check if docker ID/name is valid
docker_ps=$(docker ps);
docker_id=$1;
if [[ ! -z "$1" ]] && [[ "$docker_ps" != *"$1"* ]]; then
	echo 'Docker ID/name appears to be invalid.';
	docker_id="";
fi

#confirm we have a ID/name to run
if [ -z "$docker_id" ]; then
	echo 'You must provide a docker container ID or name to run';
	echo '';
	echo '';
	docker ps;
	exit 0;
fi;

#exec docker bash
docker exec -it $docker_id /bin/bash;

project='unkown';
if [[ $current_dir == *"-ui"* ]]; then
	project='Root';
fi;
if [[ $current_dir == *"-account"* ]]; then
	project='/account';
fi;
echo "~~~~~~~~~~~~~~~~";
echo "Make sure to upload files to ${project} directory on the server";
echo "~~~~~~~~~~~~~~~~";
