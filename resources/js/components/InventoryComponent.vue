<template>
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center justify-center">
            <div class="max-w-2xl w-full sm:w-full lg:w-full py-6 px-3">
                <div class="bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 mb-4" role="alert">
                    <p class="font-bold">Your inventory</p>
                    <p class="text-sm">All your tools.</p>
                </div>
                <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                    <div class="p-4">
                        <p class="uppercase tracking-wide text-sm font-bold text-gray-700">Inventory</p>
                    </div>
                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                        <div class="flex-1 inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-9a1 1 0 0 1 1 1v4a1 1 0 0 1-2 0v-4a1 1 0 0 1 1-1zm0-4a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
                            <p><span class="text-gray-900 font-bold ml-3">{{tools.length}}</span> Tools</p>
                        </div>
                    </div>
                    <div  v-for="tool of tools" class="px-4 pt-3 pb-4 border-t" v-bind:class="{ 'bg-gray-100': tool.available,  'bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4': tool.available == false }">
                        <tool :tool=tool></tool>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'tools': []
            }
        },

        mounted() {
            this.load();
            this.timer = setInterval(this.load, 1500);
        },

        methods: {
            load() {
                axios.get('/api/tools').then(response => {
                    this.tools = response.data;
                })
            }
        }
    }
</script>
