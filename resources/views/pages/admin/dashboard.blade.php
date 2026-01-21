@extends('layout/admin')
@section('title', 'OFF SCRIPT | Admin')

@section('content-admin')
  <main>
    <div class="flex gap-5">
      <div class="bg-black text-white w-full flex justify-between items-start p-5 rounded-xl">
        <div>
          <h3 class="text-sm mb-5 text-white/80">Total Products</h3>
          <h1 class="text-7xl font-bold">{{ $products->count() }}</h1>
        </div>

        <div class="bg-green-500 text-black rounded-lg p-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
          </svg>
        </div>
      </div>

      <div class="bg-black text-white w-full flex justify-between items-start p-5 rounded-xl">
        <div>
          <h3 class="text-sm mb-5 text-white/80">Total Customers</h3>
          <h1 class="text-7xl font-bold">{{ $totalCustomer }}</h1>
        </div>

        <div class="bg-blue-500 text-black rounded-lg p-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
          </svg>

        </div>
      </div>

      <div class="bg-black text-white w-full flex justify-between items-start p-5 rounded-xl">
        <div>
          <h3 class="text-sm mb-5 text-white/80">Total Orders</h3>
          <h1 class="text-7xl font-bold">{{ $totalOrders }}</h1>
        </div>

        <div class="bg-[#e72954] text-black rounded-lg p-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
          </svg>
        </div>
      </div>
    </div>

    <div class="mt-5 flex gap-5">
      <div class="bg-black text-white w-full p-10 rounded-xl">
        <div class="mb-6">
          <h2 class="text-xl font-semibold">
            Product by Category
          </h2>
          <p class="text-sm text-white/50 mt-1">
            Overview of product distribution across categories
          </p>
        </div>

        <div class="h-80">
          <canvas id="chart"></canvas>
        </div>
      </div>

      <div class="bg-black text-white w-full p-10 rounded-xl">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-sm text-white/60 uppercase tracking-wide">
              Total Revenue
            </p>
            <h2 class="text-4xl font-bold mt-2">
              Rp.{{ number_format($totalRevenue, 0, ',', '.') }}
            </h2>
            <p class="text-sm text-green-400 mt-1">
              {{ $growth >= 0 ? '+' : '' }}{{ $growth }}% from last month
            </p>
          </div>

          <div class="bg-[#e72954] text-black p-2 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>
          </div>
        </div>

        <div class="h-80">
          <canvas id="revenueChart"></canvas>
        </div>
      </div>
    </div>

    <div class="bg-black text-white w-full p-8 rounded-xl mt-8">
      <!-- Header -->
      <div class="flex items-center justify-between mb-6">
        <div>
          <h2 class="text-lg font-semibold">Products</h2>
          <p class="text-sm text-white/50">
            Latest products in your store
          </p>
        </div>

        <a href="/admin/product" class="text-sm font-[RobotoMono] text-[#e72954] hover:underline">
          View all
        </a>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="w-full border-collapse">
          <thead class="border-b border-white/10 text-sm text-white/50">
            <tr>
              <th class="text-left py-3">Product</th>
              <th class="text-left py-3">Category</th>
              <th class="text-right py-3">Price</th>
              <th class="text-center py-3">Stock</th>
              <th class="text-right py-3">Status</th>
            </tr>
          </thead>

          <tbody class="text-sm">
            @forelse ($products as $product)
              <tr class="border-b border-white/5 hover:bg-white/5 transition">
                <!-- Product -->
                <td class="py-4 flex items-center gap-3">
                  <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-10 h-10 rounded-md object-cover {{ $product->stock == 0 ? 'grayscale' : '' }}">
                  <div>
                    <a href="{{ route('product.product-detail.show', $product['slug']) }}" class="font-medium capitalize">
                      {{ $product->name }}
                    </a>
                    <p class="text-xs text-white/40">
                      {{ $product->slug }}
                    </p>
                  </div>
                </td>

                <!-- Category -->
                <td class="py-4 text-white/70 capitalize">
                  {{ $product->category->name }}
                </td>

                <!-- Price -->
                <td class="py-4 text-right font-[RobotoMono]">
                  Rp.{{ number_format($product->price, 0, ',', '.') }}
                </td>

                <!-- Stock -->
                <td class="py-4 text-center font-[RobotoMono]">
                  {{ $product->stock }}
                </td>

                <!-- Status -->
                <td class="py-4 text-right">
                  @if ($product->stock > 0)
                    <span class="px-2 py-1 text-xs rounded-md bg-green-500/10 text-green-400">
                      Available
                    </span>
                  @else
                    <span class="px-2 py-1 text-xs rounded-md bg-[#e72954]/10 text-[#e72954]">
                      Sold Out
                    </span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="py-10 text-center text-white/40">
                  No products available
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </main>

  <script>
    const chartLabels = @json($productChartData->keys());
    const chartValues = @json($productChartData->values());
    document.addEventListener('DOMContentLoaded', function() {

      const ctx = document.getElementById('chart');

      new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: chartLabels,
          datasets: [{
            data: chartValues,
            backgroundColor: [
              '#7A0F28',
              '#A9163A',
              '#C71F49',
              '#E72954',
              '#F04B6F',
              '#F56C8A',
              '#F89AAD'
            ],
            borderWidth: 0
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '50%',

          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                color: '#E5E7EB',
                font: {
                  size: 14
                },
                padding: 30
              }
            },
            tooltip: {
              enabled: true,
              backgroundColor: '#FFFFFF',
              titleColor: '#000000',
              bodyColor: '#000000',
              cornerRadius: 0,
              borderWidth: 0,
              padding: 10
            }
          },

          animation: {
            duration: 1000
          }
        }
      });


      const revenueCtx = document.getElementById('revenueChart');
      new Chart(revenueCtx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
          datasets: [{
            data: [12000, 12500, 13000, 13000, 14000, 15000],
            borderColor: '#e72954',
            backgroundColor: 'rgba(231, 41, 84, 0.25)',
            fill: true,
            tension: 0.4,
            pointRadius: 0,
            borderWidth: 2
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              backgroundColor: '#ffffff',
              titleColor: '#000000',
              bodyColor: '#000000',
              cornerRadius: 0
            }
          },
          scales: {
            x: {
              display: false
            },
            y: {
              display: false
            }
          }
        }
      });

    });
  </script>
@endsection
