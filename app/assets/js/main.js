// Mock Tool Data for Search
const tools = [
    { name: 'Letter Counter', category: 'Text Tools', path: '/text/letter-counter', keywords: 'count words length character' },
    { name: 'Case Converter', category: 'Text Tools', path: '/text/transform/case', keywords: 'upper lower camel snake' },
    { name: 'JSON to YAML', category: 'Converters', path: '/convert/json-yaml', keywords: 'format developer code' },
    { name: 'Unix Timestamp', category: 'Converters', path: '/convert/unix-time', keywords: 'date epoch developer' },
    { name: 'Percentage Calc', category: 'Math', path: '/math/percentage', keywords: 'percent divide math' },
    { name: 'Aspect Ratio', category: 'Math', path: '/math/aspect-ratio', keywords: 'resolution screen video' }
];

const searchInput = document.getElementById('tool-search');
const searchResults = document.getElementById('search-results');

// Simple Fuzzy Search Implementation
searchInput.addEventListener('input', (e) => {
    const query = e.target.value.toLowerCase();
    if (!query) {
        searchResults.classList.add('hidden');
        return;
    }

    const filtered = tools.filter(tool =>
        tool.name.toLowerCase().includes(query) ||
        tool.keywords.toLowerCase().includes(query) ||
        tool.category.toLowerCase().includes(query)
    );

    if (filtered.length > 0) {
        searchResults.innerHTML = filtered.map(tool => `
                    <a href="#" class="flex flex-col px-4 py-2 hover:bg-gray-50 rounded-xl">
                        <span class="text-sm font-medium text-gray-900">${tool.name}</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-tight">${tool.category} &bull; ${tool.path}</span>
                    </a>
                `).join('');
        searchResults.classList.remove('hidden');
    } else {
        searchResults.innerHTML = `<div class="p-4 text-xs text-gray-400 text-center">No tools found for "${query}"</div>`;
        searchResults.classList.remove('hidden');
    }
});

// Close search when clicking outside
document.addEventListener('click', (e) => {
    if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
        searchResults.classList.add('hidden');
    }
});