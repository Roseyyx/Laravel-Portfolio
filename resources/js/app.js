import './bootstrap'
import { createApp} from 'vue/dist/vue.esm-bundler.js'

// register components

const app = createApp({})

// app.component
import RegisterComponent from "@/components/RegisterComponent.vue";
app.component('register-component', RegisterComponent)

app.mount('#app')
