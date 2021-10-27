docker info > /dev/null 2>&1

# Ensure that Docker is running...
if [ $? -ne 0 ]; then
    echo "Docker is not running."

    exit 1
fi

docker run --rm \
    -v "$(pwd)":/opt \
    -w /opt \
    sail-php80-composer:latest \
    bash -c "composer install && cp .env.example .env && php ./artisan key:generate"

CYAN='\033[0;36m'
LIGHT_CYAN='\033[1;36m'
WHITE='\033[1;37m'
NC='\033[0m'


# 修改 .env 資料庫資訊 for sail
echo ""
echo -e "${WHITE}Setup .env DB info for sail.${NC}"
echo ""
currentFolder=${PWD##*/}
sed -i 's/^DB_HOST=.*/DB_HOST=mysql/' .env
sed -i "s/^DB_DATABASE=.*/DB_DATABASE=$currentFolder/" .env
sed -i 's/^DB_USERNAME=.*/DB_USERNAME=sail/' .env
sed -i 's/^DB_PASSWORD=.*/DB_PASSWORD=password/' .env


echo ""

if sudo -n true 2>/dev/null; then
    sudo chown -R $USER: .
    echo -e "${WHITE}Get started with:${NC} ./vendor/bin/sail up"
else
    echo -e "${WHITE}Please provide your password so we can make some final adjustments to your application's permissions.${NC}"
    echo ""
    sudo chown -R $USER: .
    echo ""
    echo -e "${WHITE}Thank you! We hope you build something incredible.${NC}"
    echo -e "${WHITE}Step 1. ${NC} Edit .env"
    echo -e "${WHITE}Step 2. ${NC} Run ./vendor/bin/sail up or ./vendor/bin/sail up -d"
fi
