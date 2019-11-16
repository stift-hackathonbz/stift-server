<template>
    <div class="flex pt-2">
        <div class="mr-3">
            <svg v-if="tool.available" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 mr-2 flex-shrink-0"><circle cx="12" cy="12" r="10" class="text-green-200 fill-current"></circle><path d="M10 14.59l6.3-6.3a1 1 0 0 1 1.4 1.42l-7 7a1 1 0 0 1-1.4 0l-3-3a1 1 0 0 1 1.4-1.42l2.3 2.3z" class="text-green-600 fill-current"></path></svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 mr-2 flex-shrink-0"><circle cx="12" cy="12" r="10" fill="#fed7d7"></circle><path fill="#f56565" d="M13.41 12l2.83 2.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 1 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12z"></path></svg>
        </div>
        <div>
            <p class="font-bold text-gray-900 pb-2">{{tool.name}}</p>
            <p class="text-sm text-gray-700 pb-2"><svg class="inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#4a5568" class="heroicon-ui" d="M5.64 16.36a9 9 0 1 1 12.72 0l-5.65 5.66a1 1 0 0 1-1.42 0l-5.65-5.66zm11.31-1.41a7 7 0 1 0-9.9 0L12 19.9l4.95-4.95zM12 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg> {{tool.current_place.name}}</p>
            <p class="text-sm text-gray-700 pb-2"><svg class="inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#4a5568" class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-8.41l2.54 2.53a1 1 0 0 1-1.42 1.42L11.3 12.7A1 1 0 0 1 11 12V8a1 1 0 0 1 2 0v3.59z"/></svg> {{tool.current_place_updated_at}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['tool'],
    }
</script>
