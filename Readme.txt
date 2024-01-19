1. 在本地计算机：
    1.1 进入项目的根目录，构建Docker镜像：
    docker build -t sandblasting .

    1.2 导出Docker镜像：
    docker save -o /tmp/sandblasting.tar sandblasting:latest

    1.3 把导出的Docker镜像上传到服务器
    scp /tmp/sandblasting.tar root@algotech.co.nz:/tmp

    1.4 删除本地临时文件
    rm /tmp/sandblasting.tar

    1.5 链接到服务器
    ssh root@algotech.co.nz

2. 在远程服务器
    2.1 先停止掉正在运行的网站Docker
    docker stop sandblasting

    2.2 删除旧的Docker和Docker image
    docker rm sandblasting
    docker rmi sandblasting

    2.3 载入Docker镜像
    docker load -i /tmp/sandblasting.tar

    2.4 运行Docker
    sh /usr/local/bin/init_docker/init_algotech-r.sh