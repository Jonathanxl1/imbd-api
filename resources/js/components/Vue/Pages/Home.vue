<template>
	<div class="container">
		<h1 class="h1 text-center">Imbd</h1>
    <div class="row ">
    <Card class="col-3 mx-auto" link="/series/" header="Series"></Card>
    <Card class="col-3 mx-auto" link="/movies" header="Recommend"></Card>
    <Card class="col-3 mx-auto" link="/movies/5" header="Movies"></Card>
  </div>
		<div class="row mt-3 ">
			<top-list name="Movie" :data="movies"></top-list>
			<top-list name="Serie" :data="series"></top-list>
		</div>
		
		
	</div>
</template>

<script>
import TopList from '../components/TopList.vue';
import Card from '../components/CardComponent.vue';
export default {

  name: 'Home',
  components:{TopList,Card},

  data () {
    return {
    	movies:{
    		type:Object
    	},
    	series:{
    		type:Object
    	}

    }
  },
  beforeCreate(){
  	fetch('/v.1/api/movies/',{method:'GET',
  		})
  		.then(response => response.json())
  		.then(data => {this.movies = data});
  	fetch('/v.1/api/series/',{method:'GET',
  		})
  		.then(response => response.json())
  		.then(data => {this.series = data});


  	},

  
}
</script>

<style lang="css" scoped>
</style>