<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    @if (session('success'))
        <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-center">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                let msg = document.getElementById('success-message');
                if (msg) {
                    msg.style.display = 'none';
                }
            }, 4000);
        </script>
    @endif

</div>

{{-- esto es para crear un componente

PS G:\programas externos\xampp\htdocs\projects\Project login\login-app> php artisan make:component AlertSuccess

   INFO  Component [G:\programas externos\xampp\htdocs\projects\Project login\login-app\app\View\Components\AlertSuccess.php] created successfully.

   INFO  View [G:\programas externos\xampp\htdocs\projects\Project login\login-app\resources\views\components/alert-success.blade.php] created successfully.   --}}
