import path from "path";
import TSConfigPathsWebpackPlugin from "tsconfig-paths-webpack-plugin";

export default () => ({
	entry: {
		index: path.resolve(__dirname, "index.ts")
	},
	output: {
		filename: "[name].js",
		path: path.resolve(__dirname, "..", "public")
	},
	devtool: "source-map",
	resolve: {
		extensions: [
			".ts",
			".tsx",
			".js"
		],
		modules: [
			path.resolve(__dirname, "node_modules"),
			path.resolve(__dirname, "src")
		],
		plugins: [
			new TSConfigPathsWebpackPlugin()
		]
	},
	module: {
		rules: [
			{
				test: /\.tsx?$/,
				use: [
					{
						loader: "ts-loader",
						options: {
							configFile: path.resolve(__dirname, "tsconfig.json")
						}
					}
				],
				exclude: /node_modules/,
				resolve: {
					fullySpecified: false
				},
			}
		]
	}
});