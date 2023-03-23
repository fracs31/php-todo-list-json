const { createApp } = Vue; //Vue

//App
createApp({
    //Dati
    data() {
        return {
            tasks: [], //tasks
            input: "", //input
        }
    },
    //Metodi
    methods: {
        //Metodo per ottenere le task
        fetchTasks() {
            //Effettuo la chiamata delle task
            axios.get("./server.php")
            .then((res) => {
                const { data } = res; //salvo i dati ricevuti dal server
                //Ciclo
                for (let i = 0; i < data.length; i++) {
                    this.tasks.push(data[i]); //memorizzo le tasks ricevute dal server dentro l'array di tasks
                }
            });
        },
        //Metodo per cambiare lo stato di una task
        changeStatus(index) {
            //Task da salvare
            const task = {
                status: index, //stato
            };
            //Chiamata al server
            axios.post("./server.php", task, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((res) => {
                const { data } = res; //salvo i dati ricevuti dal server
                this.tasks = []; //azzero la todo list
                //Ciclo
                for (let i = 0; i < data.length; i++) {
                    this.tasks.push(data[i]); //memorizzo le tasks ricevute dal server dentro l'array di tasks
                }
            });
        },
        //Metodo per inserire una nuova task
        newTask() {
            //Task da salvare
            const task = {
                submit: this.input, //submit
            };
            //Chiamata al server
            axios.post("./server.php", task, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((res) => {
                const { data } = res; //salvo i dati ricevuti dal server
                this.tasks = []; //azzero la todo list
                //Ciclo
                for (let i = 0; i < data.length; i++) {
                    this.tasks.push(data[i]); //memorizzo le tasks ricevute dal server dentro l'array di tasks
                }
            });
        },
        //Metodo per cancellare una task
        deleteTask(index) {
            //Task da salvare
            const task = {
                delete: index, //delete
            };
            //Chiamata al server
            axios.post("./server.php", task, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((res) => {
                const { data } = res; //salvo i dati ricevuti dal server
                this.tasks = []; //azzero la todo list
                //Ciclo
                for (let i = 0; i < data.length; i++) {
                    this.tasks.push(data[i]); //memorizzo le tasks ricevute dal server dentro l'array di tasks
                }
            });
        },
    },
    //Mounted
    mounted() {
        this.fetchTasks(); //chiamo le task
    }
}).mount('#app');