const blogs = [{
    id: 1,
    title: "Building Modern Web Applications with JavaScript",
    publishedAt: "2025-10-08",
    category: "JavaScript",
    intro: "Discover the latest techniques and best practices for creating dynamic, responsive web applications using modern JavaScript frameworks and libraries.",
    image: "https://images.unsplash.com/photo-1627398242454-45a1465c2479?w=800&h=400&fit=crop"
  },
  {
    id: 2,
    title: "CSS Grid vs Flexbox: When to Use Which",
    publishedAt: "2025-10-05",
    category: "CSS & Design",
    intro: "Understanding the differences between CSS Grid and Flexbox is crucial for modern web layout. Learn when and how to use each effectively.",
    image: "https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&h=400&fit=crop"
  },
  {
    id: 3,
    title: "The Future of Web Development: Trends for 2025",
    publishedAt: "2025-10-01",
    category: "Web Development",
    intro: "Explore the cutting-edge technologies and methodologies that are shaping the future of web development in 2025 and beyond.",
    image: "https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&h=400&fit=crop"
  },
  {
    id: 4,
    title: "Responsive Design Best Practices",
    publishedAt: "2025-09-28",
    category: "Design",
    intro: "Master the art of creating websites that look great on every device with these proven responsive design techniques.",
    image: "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=400&fit=crop"
  },
  {
    id: 5,
    title: "Getting Started with TypeScript",
    publishedAt: "2025-09-20",
    category: "TypeScript",
    intro: "TypeScript brings type safety and modern features to JavaScript. Learn how to get started and why you should use it.",
    image: "https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=800&h=400&fit=crop"
  },
  {
    id: 6,
    title: "10 Must-Know VS Code Extensions",
    publishedAt: "2025-09-15",
    category: "Productivity",
    intro: "Boost your productivity with these essential Visual Studio Code extensions for web developers.",
    image: "https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=800&h=400&fit=crop"
  },
  {
    id: 7,
    title: "A Guide to Web Accessibility",
    publishedAt: "2025-09-10",
    category: "Accessibility",
    intro: "Make your websites usable for everyone by following these accessibility best practices.",
    image: "https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800&h=400&fit=crop"
  },
  {
    id: 8,
    title: "Deploying Your Site with Netlify",
    publishedAt: "2025-09-01",
    category: "Deployment",
    intro: "Learn how to deploy static sites quickly and easily using Netlify’s powerful platform.",
    image: "https://images.unsplash.com/photo-1465101046530-73398c7f28ca?w=800&h=400&fit=crop"
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
