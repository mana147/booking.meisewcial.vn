<!-- ***************************** Template **************************-->
<template>
    <form v-on:submit="addItem" class="header">
        <h1 style="margin:5px">My To Do List</h1>
        <input type="text" placeholder="title ..." v-model="title" />

        <input type="submit" class="addBtn" value="ADD" />

    </form>
</template>

<!-- ***************************** Script *************************** -->
<script>
import { ref } from 'vue';
import {v4 as uuidv4} from 'uuid';

export default {
    name: 'HeaderApp',

    setup(props, { emit }) {
        const title = ref('');

        function Check() {
            console.log(title.value);
        }

        function addItem(event) {
            event.preventDefault();

            if (title.value != '') {

                const newItem = {
                    id:uuidv4() ,
                    title: title.value,
                    completed: false,
                }

                emit('add-todo', newItem);
                title.value = '';

                // console.log('newItem :>> ', newItem);

            }
        }

        return {
            title,
            Check,
            addItem
        }
    },
    methods: {
        add(event) {
            
            // console.log('this :>> ', this.title);
            
            event.preventDefault();

            if (event) {
                alert(event.target.tagName)
            }
            
        }
    }


};
</script>

<!-- ****************************** Style **************************** -->
<style scoped>
/* Style the header */
.header {
    background-color: #f44336;
    padding: 30px 40px;
    color: white;
    text-align: center;
}

/* Clear floats after the header */
.header:after {
    content: "";
    display: table;
    clear: both;
}

/* Style the input */
input {
    margin: 0;
    border: none;
    border-radius: 0;
    width: 75%;
    padding: 10px;
    float: left;
    font-size: 16px;
}

/* Style the "Add" button */
.addBtn {
    padding: 10px;
    width: 21%;
    background: #d9d9d9;
    color: #555;
    float: left;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
    border-radius: 0;
}

.addBtn:hover {
    background-color: #bbb;
}
</style>