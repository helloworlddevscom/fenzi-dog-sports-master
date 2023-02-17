/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor. All other files
 * get applied to the editor only.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './scss/style.scss';
import './scss/editor.scss';

/**
 * Primary Hero
 */
import PrimaryHeroEdit from './main_block/primary_hero/edit';
import PrimaryHeroMeta from './main_block/primary_hero/primary-hero-block.json';
registerBlockType( PrimaryHeroMeta.name, {edit: PrimaryHeroEdit} );


/**
 * Blog Posts Search
 */
import BlogPostsSearchEdit from './additional_blocks/blog_posts_search/edit';
import BlogPostsSearchMeta from './additional_blocks/blog_posts_search/blog-posts-search-block.json';
registerBlockType( BlogPostsSearchMeta.name, {edit: BlogPostsSearchEdit} );

/**
 * Blog Posts
 */
import BlogPostsEdit from './additional_blocks/blog_posts/edit';
import BlogPostsMeta from './additional_blocks/blog_posts/blog-posts-block.json';
registerBlockType( BlogPostsMeta.name, {edit: BlogPostsEdit} );

/**
 * Courses
 */
import CoursesEdit from './additional_blocks/courses/edit';
import CoursesMeta from './additional_blocks/courses/courses-block.json';
registerBlockType( CoursesMeta.name, {edit: CoursesEdit} );

/**
 * Dog Cards
 */
import DogCardsEdit from './additional_blocks/dog_cards/edit';
import DogCardsMeta from './additional_blocks/dog_cards/dog-cards-block.json';
registerBlockType( DogCardsMeta.name, {edit: DogCardsEdit} );

/**
 * Recent Blog Posts
 */
import RecentBlogPostsEdit from './additional_blocks/recent_blog_posts/edit';
import RecentBlogPostsMeta from './additional_blocks/recent_blog_posts/recent-blog-posts-block.json';
import RecentBlogPostsExample from './additional_blocks/recent_blog_posts/example.json';
registerBlockType( RecentBlogPostsMeta.name, {example: RecentBlogPostsExample, edit: RecentBlogPostsEdit} );

/**
 * Simple Category List
 */
import SimpleCategoryListEdit from './additional_blocks/simple_category_list/edit';
import SimpleCategoryListMeta from './additional_blocks/simple_category_list/simple-category-list-block.json';
import SimpleCategoryListExample from './additional_blocks/simple_category_list/example.json';
registerBlockType( SimpleCategoryListMeta.name, {example: SimpleCategoryListExample, edit: SimpleCategoryListEdit} );


/**
 * Subscribe
 */
import SubscribeEdit from './additional_blocks/subscribe/edit';
import SubscribeMeta from './additional_blocks/subscribe/subscribe-block.json';
registerBlockType( SubscribeMeta.name, {edit: SubscribeEdit} );

/**
 * Post Carousel
 */
import PostCarouselEdit from './additional_blocks/post_carousel/edit';
import PostCarouselMeta from './additional_blocks/post_carousel/post-carousel-block.json';
registerBlockType( PostCarouselMeta.name, {edit: PostCarouselEdit} );

/**
 * Post Listview
 */
import PostListviewEdit from './additional_blocks/post_listview/edit';
import PostListviewMeta from './additional_blocks/post_listview/post-listview-block.json';
registerBlockType( PostListviewMeta.name, {edit: PostListviewEdit} );

/**
 * SimpleCtaSection
 */
import SimpleCtaSectionEdit from './additional_blocks/simple_cta_section/edit';
import SimpleCtaSectionMeta from './additional_blocks/simple_cta_section/simple-cta-section-block.json';
registerBlockType( SimpleCtaSectionMeta.name, {edit: SimpleCtaSectionEdit} );

/**
 * TextListCtaSection
 */
import TextListCtaSectionEdit from './additional_blocks/text_list_cta_section/edit';
import TextListCtaSectionMeta from './additional_blocks/text_list_cta_section/text-list-cta-section-block.json';
registerBlockType( TextListCtaSectionMeta.name, {edit: TextListCtaSectionEdit} );

/**
 * CourseCategories
 */
import CourseCategoriesEdit from './additional_blocks/course_categories/edit';
import CourseCategoriesMeta from './additional_blocks/course_categories/course-categories-block.json';
registerBlockType( CourseCategoriesMeta.name, {edit: CourseCategoriesEdit} );
