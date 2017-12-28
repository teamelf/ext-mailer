/**
 * This file is part of TeamELF
 *
 * (c) GuessEver <guessever@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

import Mailer from 'teamelf/mailer/Mailer';
import App from 'teamelf/App';
import { SideNav } from 'teamelf/layout/SideNav';
import Permission from 'teamelf/Permission';

App.prototype.routes = [
  ...(App.prototype.routes || []),
  {path: '/mailer', exact: true, component: Mailer},
];
SideNav.prototype.navigations = [
  ...(SideNav.prototype.navigations || []),
  {path: '/mailer', icon: 'mail', title: '发信邮箱'}
];
Permission.prototype.permissions = [
  ...(Permission.prototype.permissions || []),
  {name: '查看发信邮箱列表', permission: 'mailer.list'},
  {name: '创新发信邮箱', permission: 'mailer.create'},
  {name: '更新发信邮箱', permission: 'mailer.update'},
  {name: '删除发信邮箱', permission: 'mailer.delete'},
];
