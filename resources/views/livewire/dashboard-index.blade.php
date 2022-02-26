<div>

    <section class="section">
        <div class="section-header">
          <h1>{{ $contentheader }}</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h1>Index Page</h1>
                    <p>
                        <input type="text" name="" id="" wire:model="name" value="null">
                        <br>
                        {{ $name }}
                        <livewire:dashboard-data-mahasiswa />
                    </p>
                </div>
            </div>
        </div>

      </section>
</div>
