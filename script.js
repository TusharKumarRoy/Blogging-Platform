
const blogs = [{
        id: 1,
        title: "Mastering JavaScript in 2025",
        publishedAt: "2025-10-01",
        category: "JavaScript",
        intro: "Learn the latest tricks and patterns in JavaScript for modern web development...",
        content: "Full article about mastering JavaScript in 2025 with new ES features, frameworks, and best practices...",
        image: "https://i.pinimg.com/736x/da/40/4b/da404bf7bd4398c9f256c65507d3c860.jpg"
    },
    {
        id: 2,
        title: "CSS Secrets for Stunning Websites",
        publishedAt: "2025-09-15",
        category: "CSS & Design",
        intro: "Discover the hidden gems in CSS to create beautiful, responsive designs...",
        content: "Deep dive into CSS Grid, Flexbox, and modern design patterns with animations and transitions...",
        image: "https://i.pinimg.com/736x/da/40/4b/da404bf7bd4398c9f256c65507d3c860.jpg"
    },
    {
        id: 3,
        title: "Why HTML Still Matters",
        publishedAt: "2025-08-30",
        category: "HTML",
        intro: "HTML is the backbone of the web. Here’s why it remains essential...",
        content: "Discussing HTML5 semantic tags, accessibility, SEO benefits, and why mastering HTML is still crucial...",
        image: "https://i.pinimg.com/736x/da/40/4b/da404bf7bd4398c9f256c65507d3c860.jpg"
    },
    {
        id: 4,
        title: "The Future of Web Development",
        publishedAt: "2025-07-20",
        category: "Web Development",
        intro: "Explore what’s coming in the next 5 years for frontend and backend developers...",
        content: "Predictions about AI in coding, WebAssembly, JAMStack, and serverless technologies shaping the future...",
        image: "https://i.pinimg.com/736x/da/40/4b/da404bf7bd4398c9f256c65507d3c860.jpg"
    }
];

// Function to render blogs dynamically
function renderBlogs(filterCategory = "All") {
    const container = document.getElementById("blog-container");
    if (!container) return;

    container.innerHTML = ""; // Clear previous blogs

    const filteredBlogs = filterCategory === "All" ?
        blogs :
        blogs.filter(blog => blog.category === filterCategory);

    if (filteredBlogs.length === 0) {
        container.innerHTML = `<p>No blogs found in this category.</p>`;
        return;
    }

    filteredBlogs.forEach(blog => {
        const card = document.createElement("div");
        card.className = "blog-card";
        card.innerHTML = `
        <img src="${blog.image}" alt="${blog.title}">
        <div class="content">
          <span class="meta">${blog.category} • ${formatDate(blog.publishedAt)}</span>
          <h3>${blog.title}</h3>
          <p>${blog.intro}</p>
        </div>
      `;
        card.onclick = () => {
            window.location.href = `blog.html?id=${blog.id}`;
        };
        container.appendChild(card);
    });
}

//format date helper function
function formatDate(dateStr) {
    const options = { year: "numeric", month: "short", day: "numeric" };
    return new Date(dateStr).toLocaleDateString(undefined, options);
}

// Initialize blog list
if (document.getElementById("blog-container")) {
    renderBlogs();

    // Category button click events
    document.querySelectorAll(".cat-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            document.querySelectorAll(".cat-btn").forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            const category = btn.getAttribute("data-category");
            renderBlogs(category);
        });
    });
}

// Render blog details on blog page
if (document.getElementById("blog-details")) {
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get("id"));
    const blog = blogs.find(b => b.id === id);

    if (blog) {
        document.getElementById("blog-details").innerHTML = `
        <img src="${blog.image}" alt="${blog.title}">
        <h2>${blog.title}</h2>
        <p class="meta">${blog.category} • ${formatDate(blog.publishedAt)}</p>
        <p class="intro">${blog.intro}</p>
        <p>${blog.content}</p>
      `;
    } else {
        document.getElementById("blog-details").innerHTML = `<p>Blog not found!</p>`;
    }
}
