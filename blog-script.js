function formatDate(dateStr) {
    const options = { year: "numeric", month: "short", day: "numeric" };
    return new Date(dateStr).toLocaleDateString(undefined, options);
}

function getBlogId() {
    const params = new URLSearchParams(window.location.search);
    let id = parseInt(params.get("id"));
    return (id && !isNaN(id)) ? id : 1;
}

// Helper to generate full image URL
function getImageUrl(filename) {
    if (!filename) return ''; // fallback if no image
    // adjust the base URL if needed
    return `http://127.0.0.1:8000/storage/${filename}`;
}

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

async function renderBlogDetails() {
    const blogDetailsContainer = document.getElementById("blog-details");
    if (!blogDetailsContainer) return;

    const blogs = await fetchBlogs();
    const id = getBlogId();
    const blog = blogs.find(b => b.id === id);

    if (blog) {
        blogDetailsContainer.innerHTML = `
            <img src="${getImageUrl(blog.featured_image)}" alt="${blog.title}">
            <h2>${blog.title}</h2>
            <p class="meta">${blog.category} • ${formatDate(blog.published_at)}</p>
            <p class="intro">${blog.excerpt}</p>
            <p>${blog.content}</p>
        `;
    } else {
        blogDetailsContainer.innerHTML = `
            <div style="text-align: center; padding: 4rem 2rem;">
                <h2 style="color: #e74c3c; margin-bottom: 1rem;">Blog Not Found</h2>
                <p style="color: #4a7c59; margin-bottom: 2rem;">The requested blog post could not be found.</p>
                <a href="blog.html?id=1" style="background: #4a7c59; color: white; padding: 1rem 2rem; text-decoration: none; border-radius: 8px; display: inline-block; transition: background 0.3s;">View Latest Blog</a>
            </div>
        `;
    }
}

async function renderRelatedBlogs() {
    const relatedContainer = document.getElementById("related-blogs");
    if (!relatedContainer) return;

    const blogs = await fetchBlogs();
    const currentId = getBlogId();
    const relatedBlogs = blogs.filter(b => b.id !== currentId).slice(0, 3);

    relatedContainer.innerHTML = '';

    relatedBlogs.forEach(blog => {
        const card = document.createElement("div");
        card.className = "related-blog-card";
        card.innerHTML = `
            <img src="${getImageUrl(blog.featured_image)}" alt="${blog.title}">
            <div class="content">
                <span class="meta">${blog.category} • ${formatDate(blog.published_at)}</span>
                <h3>${blog.title}</h3>
                <p>${blog.excerpt}</p>
            </div>
        `;
        card.addEventListener('click', () => {
            window.location.href = `blog.html?id=${blog.id}`;
        });
        relatedContainer.appendChild(card);
    });
}

async function updatePageTitle() {
    const blogs = await fetchBlogs();
    const id = getBlogId();
    const blog = blogs.find(b => b.id === id);
    if (blog) {
        document.title = `${blog.title} - MyPremiumBlog`;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    renderBlogDetails();
    renderRelatedBlogs();
    updatePageTitle();
});