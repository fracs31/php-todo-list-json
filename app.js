const { createApp } = Vue; //Vue

//App
createApp({
    data() {
        return {
            message: 'Hello Vue!'
        }
    }
}).mount('#app');