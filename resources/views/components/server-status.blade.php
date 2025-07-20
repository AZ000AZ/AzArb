<div x-data="serverStatusData()" class="fixed bottom-4 right-4 bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-4 text-white shadow-2xl">
    <div class="flex items-center gap-3">
        <div class="flex items-center gap-2">
            <i class="fas fa-server"></i>
            <span class="text-sm font-medium">Server Status</span>
        </div>
        <div class="flex items-center gap-2">
            <template x-if="isOnline">
                <div class="flex items-center gap-1">
                    <i class="fas fa-wifi text-green-400"></i>
                    <i class="fas fa-check-circle text-green-400"></i>
                </div>
            </template>
            <template x-if="!isOnline">
                <i class="fas fa-wifi text-red-400"></i>
            </template>
        </div>
    </div>
    <div class="text-xs opacity-70 mt-2">
        <span x-text="currentTime"></span> - <span x-text="isOnline ? 'Online' : 'Offline'"></span>
    </div>
</div>

<script>
    function serverStatusData() {
        return {
            isOnline: true,
            currentTime: '',

            init() {
                this.updateTime();
                setInterval(() => {
                    this.updateTime();
                }, 1000);

                // Check online status
                window.addEventListener('online', () => {
                    this.isOnline = true;
                });

                window.addEventListener('offline', () => {
                    this.isOnline = false;
                });
            },

            updateTime() {
                const now = new Date();
                this.currentTime = now.toLocaleTimeString('tr-TR');
            }
        }
    }
</script>
