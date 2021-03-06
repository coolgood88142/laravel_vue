const list = [
    {
        id: "1234567890",
        name: "Nina Ricci"
    },
    {
        id: "2345678901",
        name: "Hello Kitty"
    },
    {
        id: "3456789012",
        name: "Pusheen the cat"
    },
]
let btn = new Vue({
    el:'#btn',
    data:{
        message:'hello',
        namelist:list
    },
    created: function () {
        for (let i = 0; i < this.namelist.length; i++){
            this.$set(this.namelist[i], 'status', true);
            this.namelist[i].status = true;
         }
    },
    // computed: {
    //     isStatus() {
    //         return function (index){
    //             console.log(this.namelist[index].status);
    //             return this.namelist[index].status;
    //         }
    //     }
    // },
    // watch: {
    //     namelist(newVal, oldVal) {
    //         console.log(newVal); //改变之后的值
    //         console.log(oldVal);//改变之前的值
    //     }
    // },
    methods:{
        showAdd(index){
            let status = this.namelist[index].status
            let value = true
            if(status==value){
                status = false
            }

            this.$set(this.namelist[index], 'status', status);
            console.log(this.namelist[index].status);
        }
    }
})