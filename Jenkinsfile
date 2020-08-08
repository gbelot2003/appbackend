pipeline{
    agent 35.222.132.71
    stages{
        stage("Checkout-git"){
            steps{
                git branch: 'dev2',  
                url: 'https://github.com/gbelot2003/appbackend.git'
            }
        }
        stage("Creando entorno Docker"){
            steps{
                sh "docker-compose up -d"
            }
        }
        stage("Instalando Paquetes Compose"){
            steps{
                sh "docker-compose run --rm composer install"
            }
        }
        stage("Copiando .env y generando Llaves"){
            steps{
                sh "cp ./src/.env.example ./src/.env"
                sh "docker-compose run --rm artisan key:generate"
            }
        }
        stage("Ejecutando Pruebas Unitarias"){
            steps{
                sh "docker-compose run --rm artisan test"
            }
        }
        stage("Instalando y Probando Migraciones Mysql"){
            steps{
                sh "docker-compose run --rm artisan migrate --seed"
                sh "docker-compose run --rm artisan passport:install"
            }
        }
        stage("Cerrando Entorno Docker"){
            steps{
                sh "docker-compose down"
            }
        }
    }
    post{
        always{
            echo "========Done========"
        }
        success{
            echo "========pipeline executed successfully ========"
        }
        failure{
            echo "========pipeline execution failed========"
        }
    }
}
