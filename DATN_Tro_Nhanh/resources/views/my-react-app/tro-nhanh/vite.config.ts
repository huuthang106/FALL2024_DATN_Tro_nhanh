import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";
import { config } from "process";

// https://vitejs.dev/config/
export default () => {
    return defineConfig({
        root: "./src",
        base: "",
        plugins: [
            react(),
            {
                name: "override-config",
                config: () => ({
                    build: {
                        target: "esnext",
                    },
                }),
            },
        ],
    });
};
