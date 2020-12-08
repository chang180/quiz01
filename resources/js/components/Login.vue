<template>
        <div class="alert alert-danger w-50 mx-auto" v-if="error.show">{{error.msg}}</div>
    <form >
        <p class="text-center my-3">帳號：<input class="border-bottom" type="text" name="acc" v-model="acc"> </p>
        <p class="text-center my-3">密碼：<input class="bosubmit-bottom" type="password" name="pw" v-model="pw"> </p>
        <p class="text-center my-3"><input class="btn btn-primary" type="button" value="登入" @click="submit">
            <input class="btn btn-warning" type="reset" value="重置">
        </p>
    </form>
</template>
<script>
import { reactive,ref } from 'vue'
export default {
    setup(){
        const acc=ref('')
        const pw=ref('')
        const error=reactive({
            show:false,
            msg:""
        })
        const submit=()=>{
            // console.log(acc.value,pw.value)
            axios.post('/api/login',{acc:acc.value,pw:pw.value}).then(res=>{
                // console.log(res.data)
                if(res.data.error=='success'){
                    location.href='/admin'
                }else{
                    error.show=true
                    error.msg=res.data.msg
                    acc.value=''
                    pw.value=''
                }
            })
        }
        return {error,acc,pw,submit}
    }
}
</script>