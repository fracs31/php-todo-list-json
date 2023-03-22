<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Vue -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ae23fa42a2.js" crossorigin="anonymous"></script>
    <title>PHP Todo List JSON</title>
</head>
<body>
    <!-- App -->
    <div id="app">
        <!-- Main -->
        <main class="main-content">
            <!-- Container -->
            <div class="container">
                <!-- Contenuto -->
                <div class="content">
                    <!-- Titolo -->
                    <h1 class="title">
                        Todo List
                    </h1>
                    <!-- Todo List -->
                    <ul class="todo-list">
                        <!-- Task -->
                        <li class="task" v-for="(task, i) in tasks">
                            <!-- Nome della task -->
                            <span class="task__name" v-bind:class="(task.success) ? '' : 'done'" v-on:click="changeStatus(i)">{{ task.task }}</span>
                            <!-- Cancellazione della task -->
                            <span class="task__delete"><i class="fa-solid fa-trash"></i></span>
                        </li>
                    </ul>
                    <!-- Input -->
                    <div class="input">
                        <!-- Input -->
                        <input class="text" type="text" placeholder="Inserisci elemento...">
                        <!-- Bottone -->
                        <button class="btn">Inserisci</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- JavaScript -->
    <script src="./js/app.js"></script>
</body>
</html>