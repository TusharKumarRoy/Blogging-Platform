function formatDate(dateStr) {
    const options = { year: "numeric", month: "short", day: "numeric" };
    return new Date(dateStr).toLocaleDateString(undefined, options);
}

function getQueryParam(key) {
    const params = new URLSearchParams(window.location.search);
    return params.get(key);
}

// Convert filename to full URL
function getImageUrl(filename) {
    return filename ? `http://127.0.0.1:8000/storage/${filename}` : '';
}

// Fetch blogs from API
async function fetchBlogs() {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/blogs');
        if (!response.ok) throw new Error('Failed to fetch blogs');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error(error);
        return [];
    }
}

async function renderBlogList() {
    const blogListContainer = document.getElementById("blog-list");
    if (!blogListContainer) return;

    const blogs = await fetchBlogs();

    const currentCategory = getQueryParam('category');
    const filtered = !currentCategory || currentCategory === 'All' ?
        blogs :
        blogs.filter(b => b.category === currentCategory);

    blogListContainer.innerHTML = '';

    filtered.forEach(blog => {
        const card = document.createElement("div");
        card.className = "blog-card";
        card.innerHTML = `
            <img src="${getImageUrl(blog.featured_image)}" alt="${blog.title}">
            <div class="content">
                <span class="meta">${blog.category} • ${formatDate(blog.published_at)}</span>
                <h2>${blog.title}</h2>
                <p>${blog.excerpt}</p>
                <a class="read-more" href="blog.html?id=${blog.id}">Read More</a>
            </div>
        `;
        card.addEventListener('click', function(e) {
            if (!e.target.closest('a')) {
                window.location.href = `blog.html?id=${blog.id}`;
            }
        });
        blogListContainer.appendChild(card);
    });
}

document.addEventListener('DOMContentLoaded', async function() {
    // Set select from query param if present
    const select = document.getElementById('category-select');
    const currentCategory = getQueryParam('category') || 'All';
    if (select) {
        select.value = currentCategory;
        select.addEventListener('change', () => {
            const value = select.value;
            const url = new URL(window.location.href);
            if (value && value !== 'All') {
                url.searchParams.set('category', value);
            } else {
                url.searchParams.delete('category');
            }
            window.location.href = url.toString();
        });
    }

    await renderBlogList();
});