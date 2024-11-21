document.addEventListener('DOMContentLoaded', function () {
  const filters = document.querySelectorAll('.filament-filter');

  filters.forEach(filter => {
      filter.addEventListener('change', function () {
          // Memicu refresh data
          const table = document.querySelector('.filament-table');
          if (table) {
              table.dispatchEvent(new Event('refresh'));
          }
      });
  });
});