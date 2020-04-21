<template>
	<main>
		<HeaderComponent></HeaderComponent>
		<router-view ></router-view>
	</main>
</template>

<script>
import HeaderComponent from './components/HeaderComponent.vue';

export default {

  name: 'App',
	components:{HeaderComponent},
  data () {
    return {

    }

  },
}
</script>

