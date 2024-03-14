# laravel + Alpine.js + Tailwind CSS で作成する管理画面サンプル

タイプB：軽量版

## インストール

```bash
cp .env.example .env

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs

# alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
sail up -d

sail npm run build
```
