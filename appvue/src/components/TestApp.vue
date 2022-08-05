<!-- ***************************** template *************************** -->
<template>
    <div ref="refDiv" class="demo">
        <h1> Demo Input </h1>

        <div>
            <button v-on:click="handleClick" class="stypeInput"> Chọn Tệp </button>
            <input style="display: none;" type="file" name="myfile" ref="fileInputRef" />
        </div>

        <div>
            <p v-on:click="handleP" ref="tagP" > click vào * đây </p>
        </div>

    </div>
</template>
<!-- ***************************** Script *************************** -->
<script>
import { ref } from 'vue';

export default {
    name: 'TestApp',
    setup() {
        let data = ref([]);
        return { data };
    },
    methods :{
        handleClick: function() {
            console.log('this :>> ', this);
            this.$refs.fileInputRef.click();
        },

        handleP : function(){
            let refs = this.$refs;
            let _html = refs.tagP;
        
            _html.innerHTML= `đây là cách thức hoạt động của của ref : ${_html}`;
            console.log('refs :>> ', _html);
        }
    }
}
</script>
<!-- ***************************** style *************************** -->
<style scoped>
.demo {
    margin-top: 100px;
    padding: 100px 30px;
    border: 1px solid #000;
}

.demo>* {
    text-align: center;
}

.stypeInput {
    color: aliceblue;
    padding: 12px 15px;
    background-color: #333;
    border: 2px solid #333;
    transition: all .4s ease;
}

.stypeInput:hover {
    color: #333;
    background-color: #fff;
}
</style>