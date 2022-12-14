const { decodeEntities } = wp.htmlEntities;
import { __ } from "@wordpress/i18n";

const { Component, Fragment } = wp.element;

export class RecipeCard extends Component {
	constructor() {
		super(...arguments);
	}

	render() {
		const { recipe, preventClick } = this.props;
		return (
			<Fragment>
				<div
					id="dr-recipe-meta-main"
					className="dr-summary-holder dr-recipe-card-block default"
					style={{
						background: `rgba(${delrcp.setting_options.primaryColorRGB}, 0.05)`,
					}}
				>
					<div className="dr-post-summary">
						<div className="dr-recipe-summary-inner">
							<div className="dr-image">
								<a
									dangerouslySetInnerHTML={{
										__html:
											"" === recipe.thumbnail_url
												? recipe.fallback_svg
												: `<img
													src="${recipe.thumbnail_url}"
													alt="${decodeEntities(recipe.title)}"
												/>`,
									}}
									onClick={preventClick}
									href={recipe.permalink}
								></a>

								<div
									className="dr-buttons"
									style={{
										backgroundColor:
											delrcp.setting_options.primaryColor,
									}}
								>
									{__("Print Recipe", "delicious-recipes")}
								</div>

								{recipe.recipe_badges && (
									<span className="dr-badge">
										<a
											onClick={preventClick}
											href={recipe.recipe_badges.link}
											title={recipe.recipe_badges.badge}
											style={{
												backgroundColor:
													recipe.recipe_badges.color,
											}}
											dangerouslySetInnerHTML={{
												__html:
													recipe.recipe_badges.badge,
											}}
										></a>
									</span>
								)}
							</div>
							<div className="dr-title-wrap">
								<h2 className="dr-title">{recipe.title}</h2>

								<div className="dr-entry-meta">
									<span className="dr-byline">
										<span className="dr-meta-title">
											{__("Author:", "delicious-recipes")}
										</span>
										{recipe.author}
									</span>

									{recipe.cooking_methods.length > 0 && (
										<span className="dr-method">
											<span className="dr-meta-title">
												{__(
													"Cooking Method:",
													"delicious-recipes"
												)}
											</span>
											{recipe.cooking_methods.map(
												(method, index) => (
													<a
														key={index}
														onClick={preventClick}
														href={method.link}
														dangerouslySetInnerHTML={{
															__html: method.key,
														}}
													></a>
												)
											)}
										</span>
									)}

									{recipe.cuisine.length > 0 && (
										<span className="dr-cuisine">
											<span className="dr-meta-title">
												{__(
													"Cuisine:",
													"delicious-recipes"
												)}
											</span>
											{recipe.cuisine.map(
												(cuisine, index) => (
													<a
														key={index}
														onClick={preventClick}
														href={cuisine.link}
														dangerouslySetInnerHTML={{
															__html: cuisine.key,
														}}
													></a>
												)
											)}
										</span>
									)}

									{recipe.recipe_course.length > 0 && (
										<span className="dr-course">
											<span className="dr-meta-title">
												{__(
													"Courses:",
													"delicious-recipes"
												)}
											</span>
											{recipe.recipe_course.map(
												(course, index) => (
													<a
														key={index}
														onClick={preventClick}
														href={course.link}
														dangerouslySetInnerHTML={{
															__html: course.key,
														}}
													></a>
												)
											)}
										</span>
									)}

									{recipe.recipe_keys.length > 0 && (
										<span className="dr-category dr-recipe-keys">
											<span className="dr-meta-title">
												{__(
													"Recipe Keys:",
													"delicious-recipes"
												)}
											</span>
											{recipe.recipe_keys.map(
												(keyz, index) => (
													<a
														key={index}
														onClick={preventClick}
														href={keyz.link}
														title={keyz.key}
														dangerouslySetInnerHTML={{
															__html: keyz.icon,
														}}
													></a>
												)
											)}
										</span>
									)}
								</div>
							</div>
						</div>

						<div className="dr-extra-meta">
							{recipe.difficulty_level && (
								<span className="dr-sim-metaa dr-lavel">
									<span className="dr-meta-title">
										{__("Difficulty:", "delicious-recipes")}
									</span>
									<b>{recipe.difficulty_level}</b>
								</span>
							)}
							<span className="dr-sim-metaa dr-cook-time">
								{recipe.prep_time && (
									<span className="dr-prep-time">
										<span className="dr-meta-title">
											{__(
												"Prep Time",
												"delicious-recipes"
											)}
										</span>
										<b>
											{recipe.prep_time +
												" " +
												recipe.prep_time_unit}
										</b>
									</span>
								)}

								{recipe.cook_time && (
									<span className="dr-cook-time">
										<span className="dr-meta-title">
											{__(
												"Cook Time",
												"delicious-recipes"
											)}
										</span>
										<b>
											{recipe.cook_time +
												" " +
												recipe.cook_time_unit}
										</b>
									</span>
								)}

								{recipe.rest_time && (
									<span className="dr-rest-time">
										<span className="dr-meta-title">
											{__(
												"Rest Time",
												"delicious-recipes"
											)}
										</span>
										<b>
											{recipe.rest_time +
												" " +
												recipe.rest_time_unit}
										</b>
									</span>
								)}

								{recipe.total_time && (
									<span className="dr-total-time">
										<span
											className="dr-meta-title"
											style={{
												backgroundColor:
													delrcp.setting_options
														.primaryColor,
											}}
										>
											{__(
												"Total Time",
												"delicious-recipes"
											)}
										</span>
										<b>{recipe.total_time}</b>
									</span>
								)}
							</span>

							{recipe.no_of_servings && (
								<span className="dr-sim-metaa dr-yields">
									<span className="dr-meta-title">
										{__("Servings:", "delicious-recipes")}
									</span>
									<b>{recipe.no_of_servings}</b>
								</span>
							)}

							{recipe.calories && (
								<span className="dr-sim-metaa dr-calorie">
									<span className="dr-meta-title">
										{__("Calories:", "delicious-recipes")}
									</span>
									<b>{recipe.calories}</b>
								</span>
							)}

							{recipe.best_season && (
								<span className="dr-sim-metaa dr-season">
									<span className="dr-meta-title">
										{__(
											"Best Season:",
											"delicious-recipes"
										)}
									</span>
									<b>{recipe.best_season}</b>
								</span>
							)}
						</div>

						{recipe.description && (
							<div className="dr-summary">
								<h3 className="dr-title">
									{__("Description", "delicious-recipes")}
								</h3>
								<p
									dangerouslySetInnerHTML={{
										__html: recipe.description,
									}}
								></p>
							</div>
						)}
					</div>

					{recipe.ingredients.length > 0 && (
						<div className="dr-ingredients-list">
							<div className="dr-ingrd-title-wrap">
								<h3 className="dr-title">
									{__("Ingredients", "delicious-recipes")}
								</h3>
							</div>
							<ul className="dr-unordered-list">
								{recipe.ingredients.map((ingredient, index) => (
									<li key={index}>
										<input type="checkbox" />
										<label
											dangerouslySetInnerHTML={{
												__html: ingredient.ingre_string,
											}}
										></label>
									</li>
								))}
							</ul>
						</div>
					)}

					{recipe.instructions.length > 0 && (
						<div className="dr-instructions">
							<div className="dr-instrc-title-wrap">
								<h3 className="dr-title">
									{__("Instructions", "delicious-recipes")}
								</h3>
							</div>
							<ol className="dr-ordered-list">
								{recipe.instructions.map((inst, index) => (
									<li key={index}>
										{inst.title}
										{inst.instruction && (
											<p
												dangerouslySetInnerHTML={{
													__html: inst.instruction,
												}}
											></p>
										)}
										{inst.image && (
											<a
												dangerouslySetInnerHTML={{
													__html: inst.image,
												}}
												onClick={preventClick}
												href={recipe.permalink}
											></a>
										)}
									</li>
								))}
							</ol>
						</div>
					)}

					{recipe.notes && (
						<div className="dr-note">
							<h3 className="dr-title">
								{__("Notes", "delicious-recipes")}
							</h3>
							<p
								dangerouslySetInnerHTML={{
									__html: recipe.notes,
								}}
							></p>
						</div>
					)}
				</div>
			</Fragment>
		);
	}
}
