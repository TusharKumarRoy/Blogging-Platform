const blogs = [
    {
        id: 1,
        title: "Building Modern Web Applications with JavaScript",
        publishedAt: "2025-10-08",
        category: "JavaScript",
        intro: "Discover the latest techniques and best practices for creating dynamic, responsive web applications using modern JavaScript frameworks and libraries.",
        content: "JavaScript continues to evolve as the backbone of modern web development. In this comprehensive guide, we'll explore the latest ES2025 features, advanced async/await patterns, and how to leverage modern frameworks like React, Vue, and Angular to build scalable applications. We'll also dive into performance optimization techniques, state management patterns, and the importance of writing maintainable, testable code.",
        image: "https://images.unsplash.com/photo-1627398242454-45a1465c2479?w=800&h=400&fit=crop"
    },
    {
        id: 2,
        title: "CSS Grid vs Flexbox: When to Use Which",
        publishedAt: "2025-10-05",
        category: "CSS & Design",
        intro: "Understanding the differences between CSS Grid and Flexbox is crucial for modern web layout. Learn when and how to use each effectively.",
        content: "CSS Grid and Flexbox are powerful layout tools that solve different problems. Flexbox excels at one-dimensional layouts and component-level design, while CSS Grid is perfect for two-dimensional layouts and page-level structure. In this article, we'll explore practical examples, performance considerations, and real-world use cases to help you make informed decisions about which tool to use for your next project.",
        image: "https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&h=400&fit=crop"
    },
    {
        id: 3,
        title: "The Future of Web Development: Trends for 2025",
        publishedAt: "2025-10-01",
        category: "Web Development",
        intro: "Explore the cutting-edge technologies and methodologies that are shaping the future of web development in 2025 and beyond.",
        content: "The web development landscape is constantly evolving. From AI-powered development tools to WebAssembly's growing adoption, serverless architectures, and the rise of micro-frontends, developers need to stay informed about emerging trends. This article examines the technologies that will define web development in 2025, including progressive web apps, edge computing, and the continued evolution of JavaScript frameworks.",
        image: "https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&h=400&fit=crop"
    },
    {
        id: 4,
        title: "Responsive Design Best Practices",
        publishedAt: "2025-09-28",
        category: "Design",
        intro: "Master the art of creating websites that look great on every device with these proven responsive design techniques.",
        content: "Responsive design is no longer optional—it's essential. With the variety of devices and screen sizes available today, creating flexible, adaptive layouts is crucial for user experience and SEO. We'll cover mobile-first design principles, breakpoint strategies, flexible images, and modern CSS techniques like container queries that make responsive design more intuitive and powerful than ever.",
        image: "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=400&fit=crop"
    },
    {
        id: 5,
        title: "Getting Started with TypeScript",
        publishedAt: "2025-09-20",
        category: "TypeScript",
        intro: "TypeScript brings type safety and modern features to JavaScript. Learn how to get started and why you should use it.",
        content: "TypeScript is a superset of JavaScript that adds static typing and powerful tooling. This article covers the basics of TypeScript, how to set up a project, and the benefits of using types for large-scale applications.",
        image: "https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=800&h=400&fit=crop"
    },
    {
        id: 6,
        title: "10 Must-Know VS Code Extensions",
        publishedAt: "2025-09-15",
        category: "Productivity",
        intro: "Boost your productivity with these essential Visual Studio Code extensions for web developers.",
        content: "VS Code's extension ecosystem is vast. Here are 10 extensions that will help you write code faster, debug more easily, and stay organized.",
        image: "https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=800&h=400&fit=crop"
    },
    {
        id: 7,
        title: "A Guide to Web Accessibility",
        publishedAt: "2025-09-10",
        category: "Accessibility",
        intro: "Make your websites usable for everyone by following these accessibility best practices.",
        content: "Accessibility is about making your site usable for people of all abilities. Learn about semantic HTML, ARIA roles, color contrast, and keyboard navigation.",
        image: "https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800&h=400&fit=crop"
    },
    {
        id: 8,
        title: "Deploying Your Site with Netlify",
        publishedAt: "2025-09-01",
        category: "Deployment",
        intro: "Learn how to deploy static sites quickly and easily using Netlify’s powerful platform.",
        content: "Netlify offers continuous deployment, serverless functions, and instant rollbacks. This guide walks you through connecting your repo and going live in minutes.",
        image: "https://images.unsplash.com/photo-1465101046530-73398c7f28ca?w=800&h=400&fit=crop"
    }
];

function formatDate(dateStr) {
    const options = { year: "numeric", month: "short", day: "numeric" };
    return new Date(dateStr).toLocaleDateString(undefined, options);
}

function getBlogId() {
    const params = new URLSearchParams(window.location.search);
    let id = parseInt(params.get("id"));
    return (id && !isNaN(id)) ? id : 1;
}

function renderBlogDetails() {
    const blogDetailsContainer = document.getElementById("blog-details");
    if (!blogDetailsContainer) return;

    const id = getBlogId();
    const blog = blogs.find(b => b.id === id);

    if (blog) {
        blogDetailsContainer.innerHTML = `
            <img src="${blog.image}" alt="${blog.title}">
            <h2>${blog.title}</h2>
            <p class="meta">${blog.category} • ${formatDate(blog.publishedAt)}</p>
            <p class="intro">${blog.intro}</p>
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

function renderRelatedBlogs() {
    const relatedContainer = document.getElementById("related-blogs");
    if (!relatedContainer) return;

    const currentId = getBlogId();
    const relatedBlogs = blogs.filter(b => b.id !== currentId).slice(0, 3);

    relatedContainer.innerHTML = '';

    relatedBlogs.forEach(blog => {
        const card = document.createElement("div");
        card.className = "related-blog-card";
        card.innerHTML = `
            <img src="${blog.image}" alt="${blog.title}">
            <div class="content">
                <span class="meta">${blog.category} • ${formatDate(blog.publishedAt)}</span>
                <h3>${blog.title}</h3>
                <p>${blog.intro}</p>
            </div>
        `;
        card.addEventListener('click', () => {
            window.location.href = `blog.html?id=${blog.id}`;
        });
        relatedContainer.appendChild(card);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    renderBlogDetails();
    renderRelatedBlogs();
});

function updatePageTitle() {
    const id = getBlogId();
    const blog = blogs.find(b => b.id === id);
    if (blog) {
        document.title = `${blog.title} - MyPremiumBlog`;
    }
}
updatePageTitle();