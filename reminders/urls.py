from .views import AppointmentListView
# Create, update, delete
url(r'^/new$', AppointmentCreateView.as_view(), name='new_appointment'),
url(r'^/(?P[0-9]+)/delete$', AppointmentDeleteView.as_view(), name='delete_appointment'),