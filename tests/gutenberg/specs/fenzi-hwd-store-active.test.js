import {
  activatePlugin,
  loginUser,
  visitAdminPage,
  activateTheme
} from "@wordpress/e2e-test-utils";

import { expect, jest } from "@jest/globals";

it("verifies the theme is installed and plugin is active", async () => {
  // login as admin

  await activateTheme("Astra-Child");

  await activatePlugin("fenzi-hwd-store");

  // Select the plugin based on slug and active class
  const activePlugin = await page.$x(
    '//tr[contains(@class, "active") and contains(@data-slug, "fenzi-hwd-store")]'
  );

  // assert that our plugin is active by checking the HTML
  expect(activePlugin?.length).toBe(1);
});
