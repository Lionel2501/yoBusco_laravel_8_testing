<template>
    <div class="text-right">
        <span class="like-btn "
        @click="likeAnuncio" :class="{'like-active' : this.like}"></span>

        <p class="like-total">
            {{this.totalLikes}} me gusta
        </p>
    </div>
</template>

<script>
export default {
    props:['anuncioId', 'like', 'likes'],
    data: function() {
        return {
            totalLikes: this.likes
        }
    },
    methods:{
        likeAnuncio(){
            console.log('diste click');
            axios.post('/liked/' + this.anuncioId)
            .then(respuesta => {
                if(respuesta.data.attached.length > 0){
                    this.$data.totalLikes++;
                } else{
                    this.$data.totalLikes--;
                }

                this.isActive != this.isActive
            })
            .catch(error => {
                console.log(error)
            });
        }
    },
    computed: {
        cantidadLikes:function(){
            return this.totalLikes
        }
    }
}
</script>
