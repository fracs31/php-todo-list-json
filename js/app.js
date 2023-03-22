const { createApp } = Vue; //Vue

//App
createApp({
    //Dati
    data() {
        return {
            tasks: [], //tasks
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
            this.tasks[index].success = !this.tasks[index].success; //cambio lo stato della task da "true" a "false" e viceversa
        }
    },
    //Mounted
    mounted() {
        this.fetchTasks(); //chiamo le task
    }
}).mount('#app');