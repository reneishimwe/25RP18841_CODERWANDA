pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = "group1"  // optional, keeps docker container names clean
    }

    stages {
        stage('Checkout') {
            steps {
                echo '✅ Checkout stage running...'
                checkout scm
            }
        }

        stage('Build') {
            steps {
                echo '🔨 Build stage running...'
                // safer with sudo (if Jenkins is not in docker group)
                sh '''
                whoami
                docker --version
                docker-compose --version
                docker-compose build
                '''
            }
        }

        stage('Test') {
            steps {
                echo '🧪 Test stage running...'
                // Example test placeholder
                sh 'echo "No tests yet. Add your test commands here."'
            }
        }

        stage('Deploy') {
            steps {
                echo '🚀 Deploy stage running...'
                sh 'docker-compose up -d'
            }
        }

        stage('Cleanup') {
            steps {
                echo '🧹 Cleanup stage running...'
                // Example cleanup
                sh 'docker system prune -f || true'
            }
        }
    }

    post {
        always {
            echo '🏁 Pipeline completed!'
        }
        failure {
            echo '❌ Build failed!'
        }
        success {
            echo '✅ Build and deployment succeeded!'
        }
    }
}
